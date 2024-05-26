<?php

namespace App\Console\Commands;

use App\Models\GameMatch;
use Illuminate\Console\Command;
use Carbon\Carbon;

class AddResult extends Command
{
    protected $signature = 'matches:add-random-results';

    protected $description = 'Add random results to matches played in the last 24 hours';

    public function handle()
    {

        // Get matches played in the last 24 hours
        $matches = GameMatch::whereNull('result')->whereDate('date_match', '>=', Carbon::now()->subDay())
            ->whereDate('date_match', '<=', Carbon::now())
            ->get();
        // Update each match with random results
        foreach ($matches as $match) {
            $result =  rand(0, 1) ? 'win' : 'loss';
            $match->result = $result;
            $match->save();
            // $match->update([
            //     'result' => $result, // Example random result
            // ]);
        }

        $this->info('Random results added to matches played in the last 24 hours.');
    }
}
