
<h1>Добро пожаловать {{data.name}}</h1>
<form>
    <label>
        Email  <input type="text" name="login" value={{data.email}}>
    </label>
    <br><br>
   <label>
        Имя  <input type="text" name="name" value={{data.name}}>
    </label>
    <br><br>
    <label>
        Возраст  <input type="text" name="age" value={{data.age}}>
    </label>
    <br><br>
    <label>
        О себе  <input type="text" name="info" value={{data.info}}>
    </label>
    <br><br>
    <label>
        Аватар  <input type="text" name="avatar" value={{data.avatar}}>
    </label>
    <br><br>
   </form>
<form action="/users/loadpicture" method="post">
    </label>
        <input type="submit" value="Загрузить картинку">
    </label>
</form>