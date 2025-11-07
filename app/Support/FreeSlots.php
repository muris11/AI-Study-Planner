<?php

namespace App\Support;
use Carbon\Carbon;

class FreeSlots {
  // preferred_days example: {"Mon":["19:00-22:00"],"Wed":["19:00-22:00"],"Fri":["19:00-22:00"],"Sun":["13:00-16:00"]}
  public static function nextWeek(array $preferred_days, int $days = 7): array {
    $tz = 'Asia/Jakarta';
    $today = Carbon::now($tz)->startOfDay();
    $out = [];
    for ($i=0; $i<$days; $i++) {
      $d = $today->copy()->addDays($i);
      $dow = $d->format('D'); // Mon/Tue/...
      if (!isset($preferred_days[$dow])) continue;
      foreach ($preferred_days[$dow] as $range) {
        if (!is_string($range) || strpos($range,'-') === false) continue;
        [$s, $e] = explode('-', $range, 2);
        if (!preg_match('/^\d{1,2}:\d{2}$/', $s) || !preg_match('/^\d{1,2}:\d{2}$/', $e)) continue;
        try {
          $start = $d->copy()->setTimeFromTimeString($s);
          $end   = $d->copy()->setTimeFromTimeString($e);
          if ($end->greaterThan($start)) {
            $out[] = ["start"=>$start->toIso8601String(), "end"=>$end->toIso8601String()];
          }
        } catch (\Exception $e) {
          // Skip invalid time strings
          continue;
        }
      }
    }
    return $out;
  }
}
