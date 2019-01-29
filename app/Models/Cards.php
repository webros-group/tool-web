<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Library\Services\LogSystem;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cards extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cards';

    public function base64_to_jpeg($base64_string, $fileName = "") {
        $output_file = public_path()."/uploads";
        if (!is_dir($output_file)) {
            mkdir($output_file);
            chmod($output_file, 0777);
        }
        $output_file .= "/images";
        if (!is_dir($output_file)) {
            mkdir($output_file);
            chmod($output_file, 0777);
        }
        $this->path_file = "uploads/images/".date('Y-m-d');
        $output_file .= "/".date('Y-m-d');
        if (!is_dir($output_file)) {
            mkdir($output_file);
            chmod($output_file, 0777);
        }
        $output_file .= "/".$this->ma;
        $this->path_file .= "/".$this->ma;
        if (!is_dir($output_file)) {
            mkdir($output_file);
            chmod($output_file, 0777);
        }
        $fileNameReal = $fileName."_".time().".png";

        $output_file .= "/".$fileNameReal;
        $this->path_file .= "/".$fileNameReal;
        $this->datetime_vao = new \DateTime();
        
        // open the output file for writing
        $ifp = fopen( $output_file, 'wb' ); 

        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );

        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );

        // clean up the file resource
        fclose( $ifp ); 

        return $output_file; 
    }

}
