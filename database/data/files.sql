SELECT
    `interviews`.`patient_id`
    , `users`.`id`
    , `users`.`id`
    , `file_interview`.`user_id`
    , `files`.`name`
    , `files`.`observation`
    , `file_interview`.`user_id`
FROM
    `clinica`.`files`
    INNER JOIN `clinica`.`file_interview`
        ON (`files`.`id` = `file_interview`.`file_id`)
    INNER JOIN `clinica`.`interviews`
        ON (`file_interview`.`interview_id` = `interviews`.`id`)
    INNER JOIN `clinica`.`users`
        ON (`interviews`.`patient_id` = `users`.`id`)
WHERE (`interviews`.`patient_id` = 4);


$users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
