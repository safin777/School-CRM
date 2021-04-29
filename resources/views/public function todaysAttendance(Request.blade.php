	public function todaysAttendance(Request $request)
	{
	    $title = 'Todays Attendance';
        $active_menu = 'attendance';
        $current_menu = 'attendance_all';


            $currentDate=date("Y-m-d");
            $todaysAttendance=DB::table('admin_attendance')
            ->join('admin','admin.admin_id','=','admin_attendance.admin_id')
            ->join('branch_pop_location','branch_pop_location.id','=','admin_attendance.nearest_branch')
            ->select('admin.*','admin_attendance.*','branch_pop_location.*')
            ->where('timestamp','LIKE','%'.$request->$currentDate."%")
            ->orderBy('admin_attendance.timestamp','asc')
            ->get();



            $data_array= array();

            foreach ($todaysAttendance as $att)
            {
                $attendance_id = $att->admin_attendance.attendance_id;
                $admin_id = $att->admin_attendance.admin_id;
                $name = $att->admin.user_name;
                $nearest_branch = $att->branch_pop_location.name;
                $reason = $att->admin_attendance.reason;
                $lat = $att->admin_attendacne.location_lat;
                $lon = $att->admin_attendacne.location_lon;
                $position = $att->admin_attendance.in_out;
                $update_time=$att->admin_attendance.update_time;
                $image=$att->admin_attendance.image;
                $date_time=$att->admin_attendance.timestamp;


                $data_arr[] = array(
                  "attendance_id " => $attendance_id,
                  "admin_id" => $admin_id,
                  "name" => $name,
                  "nearest_branch" => $nearest_branch,
                  "reason" => $reason,
                  "lat" => $lat,
                  "lon" => $lon,
                  "update_time" => $update_time,
                  "image" => $image,
                  "date_time" => $date_time
                  );

            }


            $response = array(

            "att_data" => $data_arr
            );


    return view("employee.attendance",['title' => $title,'privillige_menu'=> $this->privillige_menu,'active_menu' => $active_menu, 'current_menu' => $current_menu,'response'=>$response]);
	}








  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

 <!--ajax search-->
 <script type="text/javascript">
    $(document).ready(function(){

      // DataTable
      $('#arafat2').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{route('attendance.search')}}",
         columns: [
            { data: 'attendance_id' },
            { data: 'admin_id' },
            { data: 'name' },
            { data: 'nearest_branch' },
            { data: 'reason' },
            { data: 'lat' },
            { data: 'lon' },
            { data: 'update_time' },
            { data: 'image' },
            { data: 'date_time' },

         ]
      });

    });
    </script>



////////////////////////////////////
Route::get('attendance.search','EmployeeController@todaysAttendance')->name('attendance.search');




