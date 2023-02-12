<?php

namespace App\Repositories\Interfaces;

interface BrandInterfacesRepository
{
    public  function _brands();
    public function _add_brand($request);
    public function _edit_brand($id);
    public function _update_brand($id);
    public function _delete_brand($id);
    public function _multi_delete_brand($ids);
}
