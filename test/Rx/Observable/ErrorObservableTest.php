<?php

namespace Rx\Observable;

use RuntimeException;
use Rx\TestCase;

class ErrorObservableTest extends TestCase
{
    /** @test */
    public function it_calls_observers_with_error()
    {
        $ex         = new RuntimeException('boom!');
        $observable = new ErrorObservable($ex);

        $recordedException = null;
        $observable->subscribe(
            function () {
            },
            function ($ex) use (&$recordedException) {
                $recordedException = $ex;
            },
            function () {
            }
        );

        $this->assertEquals($ex, $recordedException);
    }
}
