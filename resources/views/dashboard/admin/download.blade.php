@foreach ($data as $row)
<img src="{{ asset('upload/FotoKK/'.$row->foto_kk) }}" alt="image" width="600px">
@endforeach
