<?php
class EmployeeManager
{
    public static string $path = 'Data.json';

    public static function load(): array
    {
        $dataJson = file_get_contents(self::$path);
        $data = json_decode($dataJson);

        return self::convert($data);

    }

    public static function save($data)
    {

        $dataJson = json_encode($data);

        file_put_contents(self::$path,$dataJson);
    }
    public static function convert($data): array
    {

        $employees = [];
        foreach ($data as $item) {
            $jsonData = [
                'name' => $item->name,
                'date' => $item->date,
                'address' => $item->address,
                'position' => $item->position,
            ];
            $employee = new Employee($jsonData);



            array_push($employees, $employee);
        }

        return $employees;
    }
    public static function add($employee){


        $employees = self::load();

        array_push($employees,$employee);

        self::save($employees);
        header('Location: index.php');
    }
    public static function getById($id) : array
    {
        $employees = self::load();
        $employee = [];
        foreach ($employees as $key => $item){
            if($key == $id){
              $data = [
                  'name' => $item->name,
                   'date' => $item->date,
                  'address' => $item->address,
                  'position' => $item->position,
              ];
              $employee = [$data];
            }
        } return $employee;
    }
    public static function edit($id,$newEmployee){
    $employees = self::load();
    $employees[$id] = [
      'name' => $newEmployee->getName(),
      'date' => $newEmployee->getDate(),
      'address' => $newEmployee->getAddress(),
      'position' => $newEmployee->getPosition()
    ];
    self::save($employees);
    }
    public static function sortByDate($type)
    {
        $employees = self::load();
        usort($employees,function ($item1,$item2) use ($type){
            if ($type == 'up') {
                return $item1->date > $item2->date;
            } else {
                return $item1->date < $item2->date;
            }
        });
        return $employees;
    }

}
 