<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sign Up</title>
</head>
<body>

    <h1>Buat Akun Baru!</h1>
    <h3>Sign Up Form</h3>

    <form action="{{ route('welcome') }}" method="POST">
      @csrf
      <label for="firstname">First Name :</label>
      <br><br>
      <input type="text" name="firstname">
      <br><br>

      <label for="lastname">Last Name :</label>
      <br><br>
      <input type="text" name="lastname">
      <br><br>

      <label for="gender">Gender :</label>
      <br><br>
      <input type="radio" name="gender" value="male">Male
      <br>
      <input type="radio" name="gender" value="female">Female
      <br>
      <input type="radio" name="gender" value="other">Other
      <br><br>

      <label for="nationality">Nationality :</label>
      <br><br>
      <select name="nationality">
        <option value="ID">Indonesia</option>
        <option value="SG">Singapore</option>
        <option value="MY">Malaysia</option>
      </select>
      <br><br>

      <label for="language">Language Spoken :</label>
      <br><br>
      <input type="checkbox" name="language" value="bahasa">Bahasa Indonesia <br>
      <input type="checkbox" name="language" value="eng">English <br>
      <input type="checkbox" name="language" value="arb">Arabic <br>
      <input type="checkbox" name="language" value="other">Other
      <br><br>

      <label for="bio">Bio :</label>
      <br><br>
      <textarea name="bio" cols="30" rows="10"></textarea><br>
      <button name="signup" type="submit">Sign Up</button>
    </form>

</body>
</html>
