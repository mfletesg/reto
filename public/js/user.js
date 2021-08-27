async function saveUser(event){
  event.preventDefault()
  var name = document.getElementById('name').value
  var username = document.getElementById('username').value
  var email = document.getElementById('email').value
  if (name === '' || name === null) {
    alert('Add Name')
    return false
  }
  if (username === '' || username === null) {
    alert('Add Name')
    return false
  }
  if (email === '' || email === null) {
    alert('Add Name')
    return false
  }

  var data = {
    'name' : name,
    'username' : username,
    'email' : email,
  }

  fetch("/api/create/",
  {
      method: "POST",
      headers: {
               'Accept': 'application/json',
               'Content-Type': 'application/json',
           },
      body: JSON.stringify(data)
  })
  .then(function(res){ return res.json(); })
  .then(function(data){
    alert( JSON.stringify( data ) )
    showUsers();
    quantifiesContainer();
  })

}


function showUsers(){
  fetch("/api/users/",
  {
      method: "GET",
      headers: {
               'Accept': 'application/json',
               'Content-Type': 'application/json',
           }
  })
  .then(function(res){ return res.json(); })
  .then(function(data){
    html = ''
    for(var i=0; i<data.length; i++){
      html += '<tr>\
                <th scope="row">'+data[i]['id']+'</th>\
                <td>'+data[i]['name']+'</td>\
                <td>'+data[i]['username']+'</td>\
                <td>'+data[i]['email'].toLowerCase()+'</td>\
                <td><button type="button" class="btn btn-outline-danger" onclick="deleteUser('+parseInt(data[i]['id'])+')">🗑️</button></td>\
              </tr>';
    }
    html += ''

    console.log(html);
    $("#dataTable").html(html);
  })
}

function deleteUser(id){
  var data = {'id' : id }
  fetch("/api/delete/",
  {
      method: "POST",
      headers: {
               'Accept': 'application/json',
               'Content-Type': 'application/json',
           },
      body: JSON.stringify(data)
  })
  .then(function(res){ return res.json(); })
  .then(function(data){
    alert( JSON.stringify( data ) )
    showUsers();
    quantifiesContainer();
  })
}


function quantifiesContainer(){
  fetch("/api/quantifies/",
  {
      method: "GET",
      headers: {
               'Accept': 'application/json',
               'Content-Type': 'application/json',
           }
  })
  .then(function(res){ return res.json(); })
  .then(function(data){
    console.log(data);
    document.getElementById("quantifiesContainer").textContent = JSON.stringify(data);
  })
}

showUsers();
quantifiesContainer();
