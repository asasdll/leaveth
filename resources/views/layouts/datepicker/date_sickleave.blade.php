<script>
$(function() {
    var dateFormat = "mm/dd/yy",
        from = $("#from")
        .datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
        })
        .on("change", function() {
            to.datepicker("option", "minDate", getDate(this));
        }),
        to = $("#to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change", function() {
            from.datepicker("option", "maxDate", getDate(this));

            var date1 = $("#from").val();
            var date2 = $("#to").val();
          
            $("#daydiff").val(dayDiff);
         
            console.log($("#daydiff").val());


        });

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }

        return date;
    }


});
</script>
<div class="row">
    <div class="col-md-4 pr-1">
        <div class="form-group row">
            <label for="text" class="col-sm-3 col-form-label">นับตั้งเเต่</label>
            <div class="col-md-8 pr-1">
                <input class="form-control" type="text" id="from" name="date15" required>
            </div>
        </div>
    </div>
    <div class="col md-4 pr-1">
        <div class="form-group row">
            <label for="text" class="col-md-3 pr-1 col-form-label">ถึงวันที่</label>
            <div class="col-md-8 pr-1">
                <input class="form-control" type="text" id="to" name="date23" required>
            </div>
        </div>
    </div>
    <div class="col-md-4 pr">
        <div class="form-group row">
            <label for="text" class="col-md-3 pr-1 col-form-label">มีกำหนด</label>
            <div class="col-md-6 pr-1">
                <input type="text" class="form-control" name="da54" >
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
            @foreach($status as $ticket)
            <label for="text" class="col-md-2 pr-1 col-form-label">เบอร์ติดต่อ</label>
            <div class="col-md-6 pr-1">
                <input type="text" class="form-control" name="tel" value="{{$ticket->tel}}">
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 pr-1">
    </div>
    <div class="col-md- pr-1">
        <div class="form-group">
            <input type="file" class="form-control" id="image" name="image">
        </div>
    </div>
    <div class="col-md-2 pr-1">
    </div>
</div>