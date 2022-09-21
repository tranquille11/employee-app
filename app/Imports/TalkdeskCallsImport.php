<?php

namespace App\Imports;

use App\Models\TalkdeskCall;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Throwable;

class TalkdeskCallsImport implements ToModel, WithChunkReading, WithStartRow, WithBatchInserts, WithHeadingRow, SkipsOnError
{

    use Importable;

    private $users;
    public int $totalRows = 0;
    public int $errorsOccurred = 0;

    public function __construct()
    {
        $this->users = User::select('id', 'talkdesk_name')->get();
    }
    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        $this->totalRows++;

        $user = $this->users->filter(function ($item) use ($row) {
            return $item->talkdesk_name === trim($row['agent_name']);
        })->first();

        $handlingUser = $this->users->filter(function ($item) use ($row) {
            return $item->talkdesk_name === trim($row['handling_agent']);
        })->first();

        return new TalkdeskCall([
            'interaction_id' => $row['interaction_id'],
            'call_type' => $row['call_type'],
            'start_time' => $row['start_time'],
            'end_time' => $row['end_time'],
            'talkdesk_phone' => Str::replace("'", '', $row['talkdesk_phone_number']),
            'customer_phone' => Str::replace("'", '', $row['customer_phone_number']),
            'talk_time' => $row['talk_time'],
            'record' => $row['record'],
            'wait_time' => $row['waiting_time'],
            'hold_time' => $row['holding_time'],
            'user_id' => $user ? $user->id : null,
            'phone_display_name' => $row['phone_display_name'],
            'disposition_code' => $row['disposition_code'],
            'transfer' => $row['transfer'],
            'handling_user_id' => $handlingUser ? $handlingUser->id : null,
            'tag' => $row['tags']
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function onError(Throwable $e)
    {
        $this->errorsOccurred++;
    }
}
