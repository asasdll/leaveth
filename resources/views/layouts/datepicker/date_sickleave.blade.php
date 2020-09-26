<script>
$(function() {
    var dateFormat = "mm/dd/yy",
        from = $("#from1")
        .datepicker({
            //defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
        })
        .on("change", function() {
            to.datepicker("option", "minDate", getDate(this));
        }),
        to = $("#to1").datepicker({
            //defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change", function() {
            from.datepicker("option", "maxDate", getDate(this));

            var date1 = $("#from1").val();
            var date2 = $("#to1").val();
            var dayDiff = date_diff_indays(date1, date2);
            $("#dayDiff1").val(dayDiff);

            console.log($("#to1").val());
            console.log($("#from1").val());
            console.log($("#dayDiff1").val());


        });




});
</script>
<div class="row">
    <div class="col-md-4 pr-1">
        <div class="form-group row">
            <label for="text" class="col-sm-3 col-form-label">นับตั้งเเต่</label>
            <div class="col-md-8 pr-1">
                <input class="form-control" type="text" id="from1" name="from1" value="">
            </div>
        </div>
    </div>
    <div class="col md-4 pr-1">
        <div class="form-group row">
            <label for="text" class="col-md-3 pr-1 col-form-label">ถึงวันที่</label>
            <div class="col-md-8 pr-1">
                <input class="form-control" type="text" id="to1" name="to1" value="">
            </div>
        </div>
    </div>
    <div class="col-md-4 pr">
        <div class="form-group row">
            <label for="text" class="col-md-3 pr-1 col-form-label">มีกำหนด</label>
            <div class="col-md-6 pr-1">
                <input type="text" class="form-control" id="dayDiff1" name="daydiff1" value="" readonly>
            </div>
            <label for="text" class="col-md- pr-1 col-form-label">วัน</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 pr-1">
        <div class="form-group row">
            <label for="text" class="col-md-4 pr-1 col-form-label">ในระหว่างลาสมารถติดต่อข้าพเจ้าได้ที่</label>
            <div class="col-md-8 pr-1">
                <input type="text" class="form-control" name="address" id="address2" placeholder="Address">
            </div>
        </div>
    </div>
    <div class="col-md-6 pr-1">
        <div class="form-group row">
            <label for="text" class="col-md-2 pr-1 col-form-label">เบอร์ติดต่อ</label>
            <div class="col-md-6 pr-1">
                <input type="text" class="form-control" name="tel" value="">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 pr-1">
    </div>
    <div class="col-md- pr-1">
        @foreach ($errors->all() as $error)
        <font  color="#ff0000">{{" up image ' jpg,png,jpeg,gif,svg '"}}</font>
        @endforeach
        <div class="form-group">
            <input type="file" class="form-control" id="image" name="image">
        </div>
    </div>
    <div class="col-md-2 pr-1">
    </div>
</div>