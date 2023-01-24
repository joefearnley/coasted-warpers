<?php

it('create can be called', function() {
    $this->artisan('create')
        ->expectsQuestion('Password Length (default 16)?', '')
        ->expectsQuestion('Use special characters (Y/n)?', '')
        ->assertExitCode(0);

    $this->assertCommandCalled('create');
});

it('password defaults to 16 characters', function() {
    $this->artisan('create')
        ->expectsQuestion('Password Length (default 16)?', '')
        ->expectsQuestion('Use special characters (Y/n)?', '')
        ->expectsOutput('New Password')
        ->assertExitCode(0);
});