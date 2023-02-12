<?php

namespace App\Repositories\Interfaces\BlogInterface;

interface BlogInterfacesRepository
{
    public function blog();
    public function add_post();
    public function create_post($request);
    public function update_post($request);
    /* public function delete_post();
    public function delete_bulk_posts(); */
}
