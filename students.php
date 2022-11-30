<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <!-- Modal add -->
    <div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveStudent">
        <div class="modal-body">
            <div class="alert alert-warning d-none" id="errorMessage"></div>
            <div class="mb-3">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="Email">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="Phone">Phone</label>
                <input type="text" name="phone" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="Course">Course</label>
                <input type="text" name="course" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
        </div>
    </div>
    </div>

      <!-- Modal EDIT -->
    <div class="modal fade" id="studentEditModal" tabindex="-1" a>
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateStudent">
        <div class="modal-body">
            <div class="alert alert-warning d-none" id="errorMessageUpdate"></div>
            <input type="hidden" name="student_id" id="student_id">
            <div class="mb-3">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="Email">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="Phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone">
            </div>
            <div class="mb-3">
                <label for="Course">Course</label>
                <input type="text" name="course" class="form-control" id="course">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update changes</button>
        </div>
        </form>
        </div>
    </div>
    </div>

      <!-- Modal view -->
      <div class="modal fade" id="studentViewModal" tabindex="-1" a>
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Viewdata</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
            <div class="mb-3">
                <label for="Name">Name</label>
                <p id="view_name" class="form-control"></p>
            </div>
            <div class="mb-3">
                <label for="Email">Email</label>
                <p id="view_email" class="form-control"></p>
            </div>
            <div class="mb-3">
                <label for="Phone">Phone</label>
                <p id="view_phone" class="form-control"></p>
            </div>
            <div class="mb-3">
                <label for="Course">Course</label>
                <p id="view_course" class="form-control"></p>
            </div>
           
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
       
        </div>
    </div>
    </div>





   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>PHP AJAX CRUD WITHOUT PAGE RELOAD USING BOOTTSTRAP MODAL</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                    Tambah data
                    </button>
                </div>
                
                <div class="card-body">
                    
                    <!-- <input type=text list=items id="itemnya" style="width: 40px" name="kode_brg"  onkeyup="cariitem();">
					<input style="width: 250px" type="text" id="nama_item" name="nama_brg" value="" readonly="readonly"> -->
                    <div class="row mb-3">
		    <div class="col-sm-12"><label class="text-bold">Filer dan cari</label></div>
		    <div class="col-sm-3">
		        <div class="form-group form-inline">
		            <label>Course</label>
		            <select name="s_course" id="s_course" class="form-control">
		                <option value=""></option>
		                <option value="Udemy">Udemy</option>
		                <option value="Skill Academy">Skill Academy</option>
		            </select>
		        </div>
		    </div>
		    <div class="col-sm-4">
		        <div class="form-group form-inline">
		            <label>Keyword</label>
		            <input type="text" name="s_keyword" id="s_keyword" class="form-control">
		        </div>
		    </div>
		</div><hr>
        <div class="data"></div>
                    
                </div>
              
            </div>
        </div>
    </div>
   </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // live search dan load data
       $(document).ready(function(){
			load_data();
			function load_data(course, keyword)
			{
				$.ajax({
					method:"POST",
					url:"data.php",
					data: {course: course, keyword:keyword},
					success:function(hasil)
					{
						$('.data').html(hasil);
					}
				});
		 	}
			$('#s_keyword').keyup(function(){
				var course = $("#s_course").val();
	    		var keyword = $("#s_keyword").val();
				load_data(course, keyword);
			});
			$('#s_course').change(function(){
				var course = $("#s_course").val();
	    		var keyword = $("#s_keyword").val();
				load_data(course, keyword);
			});
		});

        // menambahkan data
        $(document).on('submit', '#saveStudent', function(e){
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_student", true);
            $.ajax({
                type: "POST",
                url:"code.php",
                data:formData,
                processData: false,
                contentType: false,
                success: function (response){
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);
                    }else if(res.status == 200){
                        $('#errorMessage').addClass('d-none');
                        $('#studentAddModal').modal('hide');
                        $('#saveStudent')[0].reset();

                        // $('#myTable').load(location.href + " #myTable");
                        $( "#myTable" ).load( "data.php" );
                        
                    }
                }
            })

        });

        // menampilkan data di modal edit
        $(document).on('click','.editStudentBtn',function(){

            var student_id = $(this).val();
            // alert(student_id);

            $.ajax({
                type: "GET",
                url:"code.php?student_id=" + student_id,
                success: function (response){


                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                       alert(res.message);
                    }else if(res.status == 200){

                        $('#student_id').val(res.data.id);
                        $('#name').val(res.data.name);
                        $('#email').val(res.data.email);
                        $('#phone').val(res.data.phone);
                        $('#course').val(res.data.course);
                        


                        $('#studentEditModal').modal('show');
                       
                    }
                }
            })
        });

        // update data
        $(document).on('submit', '#updateStudent', function(e){
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_student", true);
            $.ajax({
                type: "POST",
                url:"code.php",
                data:formData,
                processData: false,
                contentType: false,
                success: function (response){
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);
                    }else if(res.status == 200){
                        $('#errorMessageUpdate').addClass('d-none');
                        $('#studentEditModal').modal('hide');
                        $('#updateStudent')[0].reset();

                        // $('#myTable').load(location.href + " #myTable");
                        $( "#myTable" ).load( "data.php" );
                    }
                }
            })

        });

        // menampilkan data di modal edit
        $(document).on('click','.viewStudentBtn',function(){

            var student_id = $(this).val();
            // alert(student_id);

            $.ajax({
                type: "GET",
                url:"code.php?student_id=" + student_id,
                success: function (response){


                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                    alert(res.message);
                    }else if(res.status == 200){

                        $('#view_name').text(res.data.name);
                        $('#view_email').text(res.data.email);
                        $('#view_phone').text(res.data.phone);
                        $('#view_course').text(res.data.course);
                        


                        $('#studentViewModal').modal('show');
                        
                    
                    }
                }
            })
        });

        // hapus data
        $(document).on('click', '.deleteStudentBtn', function(e){
            e.preventDefault();


            if (confirm('Are you sure you want to delete this data?')) {
                var student_id = $(this).val();
                $.ajax({
                type: "POST",
                url:"code.php",
                data:{
                    'delete_student': true,
                    'student_id': student_id
                },
                
                success: function (response){
                    var res = jQuery.parseJSON(response);
                    if (res.status == 500) {

                    alert(res.message);
                    
                    }else{
                        alert(res.message);

                        // $('#myTable').load(location.href + " #myTable");
                        $( "#myTable" ).load( "data.php" );
                    }

                }
            })

            }
 
        });

    </script>
    <script>
                        function cariitem(){
                            //membuat variabel val_cari dan mengisinya dengan nilai pada field cari
                            var val_cari = $('#itemnya').val();
                         
                            //kode 1
                           var request = $.ajax ({
                                url : "cari.php",
                                data : "cari="+val_cari,
                                type : "GET",
                                dataType: "html"
                            });
                         
                            //menampilkan pesan Sedang mencari saat aplikasi melakukan proses pencarian
                            $('#hasil-cari').html('Sedang Mencari…');
                         
                            //Jika pencarian selesai
                            request.done(function(output) {
                                //Tampilkan hasil pencarian pada tag div dengan id hasil-cari
                                //$('#nama_item').html(output);
                                $('#nama_item').val(output);
                                //alert(output);
                            });
                         
                        }
                    </script>
  </body>
</html>