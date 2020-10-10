<?php include_once "navbarfooter.php";  ?>
<script type="text/javascript">
$(document).ready(function(){
    $(".tx").jqte();
    $('.sharehide').hide();
	$('.add_book').click(function(){
		$('.add_book').hide();
		$('.sharehide').toggle(600);
	})
	$('.hideadd').click(function(){
		$('.sharehide').hide();
		$('.add_book').toggle(600);
	})
			readRecords(1);
			readRecordspdf(1);
			readRecordsCreate(1);
			readRecordsCom();
            readRecordsProfile();
            readRecordsProfileSh();
            readRecordsProfileCr();
            GetUserDetails();
            approvedadmin();
            showpdfcom();
            showfram()
            // readRecordsShareCom()
 



            function readRecords(pagesh){
    var readrecord= 'readrecord';
    var fil='';
    $.ajax({
        url:"aj.php",
        type:"post",
        data:{ rreadrecord:readrecord,pagesh:pagesh},
        success:function(data,status){
            $("#records_contant").html(data); 
        }
    })
}

$("#filter").on('change',function(){
    var fil=$(this).val();
    var readrecord= 'readrecord';
    $.ajax({
        url:"aj.php",
        type:"post",
        data:{ rreadrecord:readrecord,fil:fil},
        success:function(data,status){
            $("#records_contant").html(data); 
        }
    })
})

$(document).on('click',".pagenosh",function(){
    $num=$(this).attr("id");
    readRecords($num);
})
$(document).on('click',".pagenofilter",function(){
    var pagesh=$(this).attr("id");
    var fil=$("#filter").val();
    var readrecord= 'readrecord';
    $.ajax({
        url:"aj.php",
        type:"post",
        data:{ rreadrecord:readrecord,fil:fil,pagesh:pagesh},
        success:function(data,status){
            $("#records_contant").html(data); 
        }
    })

})

// $.get("aj.php","details=$_GET['details']", function(response){
//     $("#result").html(response);
// }).fail(function(){
//     console.log("Fail to get the data")
// }).done(function(){
//     console.log("completed")
// })

function readRecordspdf(pagesh){
    var readrecordpdf= 'readrecord';
    var fil='';
    $.ajax({
        url:"aj.php",
        type:"post",
        data:{ rreadrecordpdf:readrecordpdf,pagesh:pagesh},
        success:function(data,status){
            $("#pdfread").html(data); 
        }
    })
}

$("#filterpdf").on('change',function(){
    var fil=$(this).val();
    var readrecordpdf= 'readrecord';
    $.ajax({
        url:"aj.php",
        type:"post",
        data:{ rreadrecordpdf:readrecordpdf,fil:fil},
        success:function(data,status){
            $("#pdfread").html(data); 
        }
    })
})

$(document).on('click',".pdfpagenosh",function(){
    $num=$(this).attr("id");
    readRecordspdf($num);
})
$(document).on('click',".pdfpagenofilter",function(){
    var pagesh=$(this).attr("id");
    var fil=$("#filterpdf").val();
    var readrecordpdf= 'readrecord';
    $.ajax({
        url:"aj.php",
        type:"post",
        data:{ rreadrecordpdf:readrecordpdf,fil:fil,pagesh:pagesh},
        success:function(data,status){
            $("#pdfread").html(data); 
        }
    })

})








})






function readRecordsCreate(pageval){
    var readrecord= 'readcreate';
    $.ajax({
        url:"aj.php",
        type:"post",
        data:{ rreadr:readrecord,pageval:pageval },
        success:function(data,status){
            $("#records_create").html(data)
        }
    })
}
$(document).on('click',".pageno",function(){
    // console.log($(this).li.attr('da-id'));
    // $num=$(this).html();
    $num=$(this).attr("id");
    // $num=$(this).li.attr('da-id');
    readRecordsCreate($num);
})

function addRecordCreate(){
    var title=$('#tit').val();
    var descr=$('#des').val();
    if (title == "" || descr == "") {
					alert("Fill the form value first");
					return;
				}
    $.ajax({
        url:"aj.php",
        type: 'post',
        data:{
            title:title,
            descr:descr
        },
        success:function(data,status){
            readRecordsCreate();
			clearCreate();
            if (data) {
					alert("wait for approve by admin.");
					return;
				}
        }
    })
}
function clearCreate(){
				$("#tit").val("");
				$("#des").val("");
}
function readRecordsCom(){
    var readcom= 'readcom';
    $.ajax({
        url:"aj.php",
        type:"post",
        data:{ readcom:readcom},
        success:function(data,status){
            $("#showcom").html(data)
        }
    })
}
function addCom(){

    var text=$('#text').val();
    if (text == "") {
					alert("Fill the comment box first");
					return;
				}
    $.ajax({
        url:"aj.php",
        type: 'post',
        data:{
            text:text,
        },
        success:function(data,status){
            readRecordsCom();
			clearCom();
        }
    })
}

function clearCom(){
				$("#text").val(" ");
}
function readRecordsProfile(){
    var readpro= 'readpro';
    $.ajax({
        url:"aj.php",
        type:"post",
        data:{ readpro:readpro},
        success:function(data,status){
            $("#profile_update").html(data)
        }
    })
}
function readRecordsProfileSh(){
    var readprosh= 'readprosh';
    $.ajax({
        url:"aj.php",
        type:"post",
        data:{ readprosh:readprosh},
        success:function(data,status){
            $("#profile_updatesh").html(data);
            
        }
    })
}
function delsh(userdelsh){
    var useralertsh=confirm ('Are you sure');
    if(useralertsh==true){
    $.ajax({
      url:"aj.php",
      type:"post",
      data:{userdelsh:userdelsh},
      success: function(data,status){
        readRecordsProfileSh()

      }
    })
  
    }
}
function readRecordsProfileCr(){
    var readprocr= 'readprocr';
    $.ajax({
        url:"aj.php",
        type:"post",
        data:{ readprocr:readprocr},
        success:function(data,status){
            $("#profile_updatecr").html(data);
            
        }
    })
}
function delcr(userdelcr){
    var useralert=confirm ('Are you sure');
    if(useralert==true){
    $.ajax({
      url:"aj.php",
      type:"post",
      data:{userdelcr:userdelcr},
      success: function(data,status){
        readRecordsProfileCr();
      }
    }) 
    }
}
function GetUserDetails(){
var userdetails='userdetails';
$.post("aj.php",{
    userdetails:userdetails
},
function(data,status){
  var user= JSON.parse(data);
  $("#naup").val(user.name);
  $("#phup").val(user.phone);
  $("#emup").val(user.email);
}
);
}
function updateuserdetail(){
  var nameup=$("#naup").val();
  var mobileup=$("#phup").val();
  var emailup=$("#emup").val();

  $.post("aj.php",{
    nameup:nameup,
    mobileup:mobileup,
    emailup:emailup
  },
  function(data,status){
    GetUserDetails()
  })
}

/////approved start
function approvedadmin(){
    var approved= 'approved';
    $.ajax({
        url:"aj.php",
        type:"post",
        data:{ approved:approved},
        success:function(data,status){
            $("#approved").html(data);
            
        }
    })
}
function appacc(useracc){
    var useraccess=confirm ('Allow');
    if(useraccess==true){
    $.ajax({
      url:"aj.php",
      type:"post",
      data:{useracc:useracc},
      success: function(data,status){
        approvedadmin()
      }
    })
  
    }
}
function appdel(userdel){
    var userdelete=confirm ('Deny');
    if(userdelete==true){
    $.ajax({
      url:"aj.php",
      type:"post",
      data:{userdel:userdel},
      success: function(data,status){
        approvedadmin()
      }
    })
  
    }
}

/////approved end

///////share com start
function addshareCom(){
    var textShare=$('#textShare').val();
    var textval=$('#shareidcom').val();
    if (textShare == "") {
					alert("Fill the comment box first");
					return;
				}
    $.ajax({
        url:"aj.php",
        type: 'post',
        data:{
            textShare:textShare,textval:textval
        },
        success:function(data,status){
            clearShareCom();
            location.reload();
            // readRecordsShareCom();
			
        }
    })
}


function clearShareCom(){
				$("#textShare").val(" ");

}
///////share com end

///////pdf com start


function showpdfcom(){
    var readshowpdf=$("#pdfidcom").val();;
    $.ajax({
        url:"aj.php",
        type:"get",
        data:{ readshowpdf:readshowpdf},
        success:function(data,status){
            $("#showpdf").html(data);
            
        }
    })
}


function addpdfCom(){
    var textpdf=$('#textpdf').val();
    var textval=$('#pdfidcom').val();
    if (textpdf == "") {
					alert("Fill the comment box first");
					return;
				}
    $.ajax({
        url:"aj.php",
        type: 'post',
        data:{
            textpdf:textpdf,textval:textval
        },
        success:function(data,status){
            clearpdfCom();
            showpdfcom();
            // readRecordsShareCom();
			
        }
    })
}
console.log(textpdf);

function clearpdfCom(){
				$("#textpdf").val(" ");

}
///////pdf com end

//////////fram start
function showfram(){
    var readfram=$("#pdfidcom").val();;
    $.ajax({
        url:"aj.php",
        type:"get",
        data:{ readfram:readfram},
        success:function(data,status){
            $("#showfram").html(data);
            
        }
    })
}
//////////fram end



</script>
</body>
</html>