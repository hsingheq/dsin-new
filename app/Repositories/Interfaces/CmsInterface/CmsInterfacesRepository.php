<?php

namespace App\Repositories\Interfaces\CmsInterface;

interface CmsInterfacesRepository
{
    public function cms();
    public function add_page();
    public function create_page($request);
    public function update_page($request);
    /* public function delete_post();
    public function delete_bulk_posts(); */
}
