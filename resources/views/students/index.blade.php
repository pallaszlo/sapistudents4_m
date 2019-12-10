<table border='1'>
@foreach($studs as $stud)
  <tr>
    <td>{{$stud->id}}</td>
    <td>{{$stud->name}}</td>
    <td>{{$stud->email}}</td>
  </tr>
@endforeach
</table>
