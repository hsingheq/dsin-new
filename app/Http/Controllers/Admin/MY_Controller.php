<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class MY_Controller extends Controller
{
    /**
     * 
     * Author:   Arjun Singh 
     * @Email:  webhunterr@gmail.com
     * Description: This class has my own helper function.
     * Its for both Models and controllers. 
     * 
     */

    public function removeImage($basepath = null, $filename = null)
    {
        $path = public_path() . $basepath . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
    }

    public function resultCheck($result = null, $msg = null)
    {
        if ($result) {

            /*  return redirect()->back()->with('succed', $msg); */
            flash($msg)->success();
            return back();
        } else {

            /* return redirect()->back()->with('fail', "something went wrong!"); */
            flash("Something went wrong")->error();
            return back();
        }
    }
    /* for delete folder and file*/
    public function emptyDir($dir)
    {
        if (is_dir($dir)) {
            $scn = scandir($dir);
            foreach ($scn as $files) {
                if ($files !== '.') {
                    if ($files !== '..') {
                        if (!is_dir($dir . '/' . $files)) {
                            unlink($dir . '/' . $files);
                        } else {
                            emptyDir($dir . '/' . $files);
                            rmdir($dir . '/' . $files);
                        }
                    }
                }
            }
        }
    }

    public  function deleteDir($dir)
    {
        if ($dir !== false and is_dir($dir)) {
            // Return canonicalized absolute pathname
            foreach (glob($dir . '/' . '*') as $file) {
                if (is_dir($file)) {


                    deleteDir($file);
                } else {

                    unlink($file);
                }
            }
            $this->emptyDir($dir);
            rmdir($dir);
        } else {
            return redirect()->back()->with('fail', 'directory does not exist!');
        }
    }









    /*******
     ******* DB Equolents
     * @Model Function starts
     * *****
     * *****
     */
    public function _row($table, $id, $key = 'id')
    {
        $values  = DB::table($table)->where($key, $id)->get()->first();
        return $values;
    }


    public function _getAll($table)
    {
        $values  = DB::table($this->table)->latest()->get();
        return $values;
    }

    public function _isvalid($table, $id, $route, $field = 'id')
    {
        $vals = DB::table($table)->find($id);
        if (!isset($vals)) {
            echo  $this->sendback($route);
        }
    }

    function sendback($path)
    {
        //this will send back and code Execution will be die 
        echo "<script>window.location.href='" . $path . "';</script>";
        die;
    }


    public function _delete($table = null, $id = null, $field = 'id')
    {
        return DB::table($table)->where($field, $id)->delete();
    }


    public function _multiple_delete($table = null, $ids = null)
    {
        return  DB::table($table)->whereIn('id', $ids)->delete();
    }
}
