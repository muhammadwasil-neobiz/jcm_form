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
    <script src="assets/scripts/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<script>
	$(document).ready(function(){

        
		localStorage.setItem('start_date','');
        localStorage.setItem('end_date','');
        localStorage.setItem('page_no', '1');
        
        var rows = $('#rowNum option:selected').val()
        
        localStorage.setItem('rows', rows)
        fetch_data(localStorage.getItem("start_date"), localStorage.getItem('end_date'), localStorage.getItem('page_no'), localStorage.getItem('rows'));

		fetch_pagination(localStorage.getItem("page_no"), localStorage.getItem('rows'), localStorage.getItem('start_date'), localStorage.getItem('end_date'));

        function fetch_data(start_date, end_date, page_no, rows){
            $.ajax(
                {
                    url:'fetch_data.php',
                    method:'POST',
                    data:{
                        start_date: start_date,
                        end_date: end_date,
						page_no:page_no,
						rows: rows
                    },
                    success: function(data){
                        $('#data-table').html(data)
                    }
                }
            )
        }

		function fetch_pagination(page_no, rows, start_date, end_date){
			$.ajax(
				{
					url:'fetch_page_number.php',
					method: 'POST',
					data: {
						page_no:page_no,
                        rows: rows,
                        start_date:start_date,
                        end_date:end_date
					},
					success: function(data){
						$('#pagination-nav').html(data);
					}
				}
			)
		}

        /*$('#startdatepicker').datepicker({
            dateFormat: "yy-m-dd",
            onSelect: function(dateText, inst) {
                $("input[name='start']").val(dateText);
                localStorage.setItem('start_date',dateText)
                fetch_pagination('1', localStorage.getItem('rows'));
                fetch_data(localStorage.getItem("start_date"),localStorage.getItem('end_date'), '1', localStorage.getItem("rows"));
            }
        });

        $('#enddatepicker').datepicker({
            dateFormat: "yy-m-dd",
            onSelect: function(dateText, inst) {
                $("input[name='end']").val(dateText);
                localStorage.setItem('end_date',dateText)
                fetch_pagination('1', localStorage.getItem('rows'));
                fetch_data(localStorage.getItem("start_date"),localStorage.getItem('end_date'), '1', localStorage.getItem("rows"));
            }
        });*/

        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            localStorage.setItem('start_date',start.format('YYYY-MM-DD'))
            localStorage.setItem('end_date',end.format('YYYY-MM-DD'))
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            fetch_pagination('1', localStorage.getItem('rows'), localStorage.getItem('start_date'), localStorage.getItem('end_date'));
            fetch_data(localStorage.getItem("start_date"),localStorage.getItem('end_date'), '1', localStorage.getItem("rows"));
        });

        /*$('#date-select').change(function(){
            var date = $(this).val();
            localStorage.setItem("date", date);
            fetch_data(localStorage.getItem("date"), localStorage.getItem('page_no'), localStorage.getItem("rows"));
        })
        */
       
        $(document).on('click', '.paginate-data', function(){
            var page_no = $(this).data('pageno');
            localStorage.setItem("page_no", page_no)
            fetch_data(localStorage.getItem("start_date"),localStorage.getItem('end_date'), localStorage.getItem('page_no'), localStorage.getItem("rows"));
            fetch_pagination(localStorage.getItem('page_no'), localStorage.getItem('rows'), localStorage.getItem('start_date'), localStorage.getItem('end_date'));
            console.log(rows)
        })

        $('#rowNum').change(function(){
            var rows = $(this).val();
            localStorage.setItem("rows",rows)
            console.log(rows)
            fetch_pagination(localStorage.getItem('page_no'), localStorage.getItem('rows'), localStorage.getItem('start_date'), localStorage.getItem('end_date'));
            fetch_data(localStorage.getItem("start_date"),localStorage.getItem('end_date'), localStorage.getItem('page_no'), localStorage.getItem("rows"));
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
