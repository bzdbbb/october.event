    $(document).ready(function() {
        var calendar = $("#calendar").calendar({
            tmpl_path: "/plugins/bzdbbb/event/assets/bootstrap-calendar/tmpls/",
            events_source: function() {
                return [];
            }
        });
    });