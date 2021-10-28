<?php

namespace App\Imports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithBatchInserts; //works on model and not in collection (remove if using ToCollection)
use Maatwebsite\Excel\Concerns\WithChunkReading;
//use Maatwebsite\Excel\Concerns\WithEvents; WithEvents
use Maatwebsite\Excel\Validators\Failure;
//use Illuminate\Contracts\Queue\ShouldQueue; ShouldQueue RegistersEventListeners
use Throwable;

class PatientImport implements
    ToModel,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure,
    WithBatchInserts,
    WithChunkReading
    
   
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Patient([
            //columns name
            'firstname' => $row['first_name'],
            'middlename' => $row['middle_name'],
            'lastname' => $row['last_name'],
            'extensionname' => $row['extension_name'],
            'gender' => $row['gender'],
            'birthday' => $row['birthday'],
            'email' => $row['email'],
            'contactnumber' => $row['contact_number'],
            'streetnumber' => $row['street_number'],
            'streetname' => $row['street_name'],
            'brgy' => $row['brgy'],
            'district' => $row['district'],
            'city' => $row['city'],
        ]);
    }

    public function onError(Throwable $error)
    {
               
    }

    public function rules(): array
    {
        return[
            '*.email' => ['email', 'unique:patients,email']
            //'*.birthday' => ['birthday', 'unique:patients,birthday']
        ];
    }

    // for skipping failures/errors on import
    /*public function onFailure(Failure ...$failure)
    {
        
    }*/

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    /*public static function afterImport(AfterImport $event)
    {

    }*/
}
