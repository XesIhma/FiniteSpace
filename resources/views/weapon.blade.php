<h1>Ships</h1>

<table border='1' padding='3'>
  <tr>
    <th>Id</th>
    <th>Model</th>
    <th>HP</th>
    <th>Masa</th>
    <th>Obrażenia</th>
    <th>Zużycie mocy</th>
    <th>Slot</th>
    <th>Cena</th>
  </tr>

  @foreach($weapons as $weapon)
    <tr>
      <td>{{$weapon['id']}}</td>
      <td>{{$weapon['model']}}</td>
      <td>{{$weapon['hp_max']}}</td>
      <td>{{$weapon['mass']}}</td>
      <td>{{$weapon['damage']}}</td>
      <td>{{$weapon['power_cons']}}</td>
      <td>{{$weapon['slot']}}</td>
      <td>{{$weapon['current_price']}}</td>
    </tr>
  @endforeach



  
</table>