<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Üye Kayıt Formu</title>
</head>
<body>
  @if($errors->any())
  <ul>
  @foreach($errors->all() as $hata)
  <li>{{$hata}} </li>
  @endforeach
  </ul>
  @endif
  <form action="{{route('uyekayit')}}" method="post">
@csrf

<label>Tc </label><br>
<input type="text" name="kimlikno"><br>

<label>Ad</label><br>
<input type="text" name="ad"><br>

<label>Soyad</label><br>
<input type="text" name="soyad"><br>

<label>Doğum tarihi</label><br>
<input type="date" name="dogumYili"><br>

<label>Telefon </label><br>
<input type="text" name="telefon"><br>

<label>mail</label><br>
<input type="text" name="mail"><br><br>

<select name="firma">
  @foreach($firmalar as $firma)
  <option value={{$firma->id}}>{{$firma->firma}}</option>
  @endforeach

</select><br><br>
<input type="submit" name="ilet" value="gönder">
  </form>
</body>
</html>
