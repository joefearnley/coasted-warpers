<?php

it('has createcommand page', function () {
    $response = $this->get('/createcommand');

    $response->assertStatus(200);
});
