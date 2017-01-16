<script type="text/javascript">
    $(document).ready(function () {

        $(".kkcountdown-{key_id}").kkcountdown({
            dayText: 'ngày ',
            daysText: ' ngày ',
            hoursText: 'h ',
            minutesText: 'm ',
            secondsText: 's',
            displayZeroDays: true,
            callback: cBack,
            rusNumbers: false
        });
    });

    function cBack() {
        console.log('THE END - Function callback!');
    }
</script>