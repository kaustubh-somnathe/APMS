$('#allot_project').click(function(){
   project =  $('#project').val();
    leaderid = $('#leaderid').val();
if(project == ""){
  return false;
}
if(leaderid == ""){
  return false;
}
        $.ajax({
        url: "ajax/ajax_assign_project.php",
      method: "POST",
      data:{project: project, leaderid:leaderid}, 
      dataType: "html"
    }).done(function(msg) {
      $('#result').html(msg);
    });
    setTimeout(function()
      {
        $('#result').html('');
        location.reload();
      }, 2000);
        
});

function approve(id){
if(id == ""){
return false;
}

  $.ajax({
        url: "ajax/ajax_approve_project.php",
      method: "POST",
      data:{id: id}, 
      dataType: "html"
    }).done(function(msg) {
      $('#inside'+id).html(msg);
      
    });
    setTimeout(function()
      {
        location.reload();
      }, 2000);
}


function comment(id){
  comment = $('#comment').val();
  user_id = $('#user_id').val();
  if(comment == ""){
    return false;
  }
  if(user_id == ""){
    return false;
  }

  $.ajax({
        url: "ajax/ajax_comment.php",
      method: "POST",
      data:{user_id:user_id, project_id: id, comment:comment}, 
      dataType: "html"
    }).done(function(msg) {
            
    });
    setTimeout(function()
      {
        location.reload();
      }, 2000);
}

function updatePercentage(id){

  updatedPercentage = $('#updatedPercentage').val();
  if(updatedPercentage == ""){
    return false;
  }

  $.ajax({
        url: "ajax/ajax_updateProjectPercentage.php",
      method: "POST",
      data:{project_id: id, updatedPercentage:updatedPercentage}, 
      dataType: "html"
    }).done(function(msg) {
            
    });
    setTimeout(function()
      {
        location.reload();
      }, 1000);
}