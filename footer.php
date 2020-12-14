<div class="clearfix mt-5"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; <a href="#">NeoBizSolutions</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script>
	$(document).ready(function(){
		localStorage.setItem('date','')
        localStorage.setItem('page_no', '1');
        
        var rows = $('#rowNum option:selected').val()
        
        localStorage.setItem('rows', rows)
        fetch_data(localStorage.getItem("date"), localStorage.getItem('page_no'), localStorage.getItem('rows'));

        date_select();

		fetch_pagination();

        function fetch_data(date, page_no, rows){
            $.ajax(
                {
                    url:'fetch_data.php',
                    method:'POST',
                    data:{
                        date: date,
						page_no:page_no,
						rows: rows
                    },
                    success: function(data){
                        $('#data-table').html(data)
                    }
                }
            )
        }

        function date_select(){
            $.ajax(
                {
                    url:'order_by_date.php',
                    method: 'GET',
                    success: function(data){
                        $('#date-select').html(data);
                    }
                }
            )
        }

		function fetch_pagination(page_no='1'){
			$.ajax(
				{
					url:'fetch_page_number.php',
					method: 'POST',
					data: {
						page_no:page_no
					},
					success: function(data){
						$('#pagination-nav').html(data);
					}
				}
			)
		}

        $('#date-select').change(function(){
            var date = $(this).val();
            localStorage.setItem("date", date);
            fetch_data(localStorage.getItem("date"), localStorage.getItem('page_no'), localStorage.getItem("rows"));
        })

        $('#rowNum').change(function(){
            var rows = $(this).val();
            localStorage.setItem("rows",rows)
            console.log(rows)
            fetch_data(localStorage.getItem("date"), localStorage.getItem('page_no'), localStorage.getItem("rows"));
        })

        $(document).on('click', '.paginate-data', function(){
            var page_no = $(this).data('pageno');
            localStorage.setItem("page_no", page_no)
            fetch_data(localStorage.getItem("date"), localStorage.getItem('page_no'), localStorage.getItem("rows"));
            fetch_pagination(localStorage.getItem('page_no'));
            console.log(rows)
        })

		/*$(document).on('click', '.paginate-data', function(){
			var page_no = $(this).data('pageno');
			console.log(page_no);
			fetch_data(date, page_no, rows)
            fetch_pagination(page_no);
            console.log(rows)
            
            if($('#date-select').change(function(){
                var date = $(this).val();
                fetch_data(date, page_no, rows);
            }))
            {
                fetch_pagination(page_no);
            }
            else if($('#rowNum').change(function(){
            var rows = $(this).val();
            console.log(rows)
            fetch_data(date, page_no, rows);
            }))
            {
                fetch_pagination(page_no);
            }
        })

        $('#date-select').change(function(){
            var date = $(this).val();
            fetch_data(date, page_no, rows);

            if($(document).on('click', '.paginate-data', function(){
                var page_no = $(this).data('pageno');
                console.log(page_no);
                fetch_pagination(page_no);
            })){
                fetch_data(date, page_no, rows)
            }
            else if($('#rowNum').change(function(){
                var rows = $(this).val();
                console.log(rows)
                fetch_data(date, page_no, rows);
            })){
                fetch_pagination(page_no);
            }
        })

        $('#rowNum').change(function(){
            var rows = $(this).val();
            console.log(rows)
            fetch_data(date, page_no, rows);

            if($(document).on('click', '.paginate-data', function(){
                var page_no = $(this).data('pageno');
                console.log(page_no);
                fetch_pagination(page_no);
            })){
                fetch_data(date, page_no, rows)
            }
            else if($('#rowNum').change(function(){
            var rows = $(this).val();
            console.log(rows)
            fetch_data(date, page_no, rows);
            }))
            {
                fetch_pagination(page_no);
            }
        })

        /*$('#date-select').change(function(){
            var date = $(this).val();
            console.log(date)
            fetch_data(date, page_no, rows);
            fetch_pagination(page_no);
        })

        $('#rowNum').change(function(){
            var rows = $(this).val();
            console.log(rows)
            fetch_data(date, page_no, rows);
            fetch_pagination(page_no);
        })*/
    })

	</script>
</body>

</html>
