<?php

namespace PHPSTORM_META {

    // Plugin Expectations
    override(\expect(), map([
        '' => \Pest\Laravel\Contracts\ExpectationsInterface::class,
    ]));
    override(\Pest\Expectation::and(0), map([
        '' => \Pest\Laravel\Contracts\ExpectationsInterface::class,
    ]));

}
