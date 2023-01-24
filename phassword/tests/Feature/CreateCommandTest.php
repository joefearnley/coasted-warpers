<?php

it('create can be called', function() {
    $this->artisan('create')
        ->expectsQuestion('Password Length (default 16)?', '')
        ->expectsQuestion('Use special characters (Y/n)?', '')
        ->assertExitCode(0);

    $this->assertCommandCalled('create');
});
