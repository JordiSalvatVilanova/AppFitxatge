$(document).ready(function () {
    var events = JSON.parse(localStorage.getItem("events")) || [];

    $("#calendar").fullCalendar({
        header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay"
        },
        defaultView: "month",
        navLinks: true,
        selectable: true,
        selectHelper: false,
        editable: true,
        eventLimit: true,

        select: function (start, end) {
            var title = prompt("Contenido del evento:");
            var eventData;
            if (title) {
                eventData = {
                    title: title,
                    start: start,
                    end: end
                };
                $("#calendar").fullCalendar("renderEvent", eventData, true);
                events.push(eventData);
                localStorage.setItem("events", JSON.stringify(events));
            }
            $("#calendar").fullCalendar("unselect");
        },

        eventRender: function (event, element) {
            element
                .find(".fc-content")
                .prepend("<span class='closeon material-icons'>&#xe5cd;</span>");
            element.find(".closeon").on("click", function () {
                $("#calendar").fullCalendar("removeEvents", event._id);
                events = events.filter(function (e) {
                    return e.start.format() !== event.start.format() || e.end.format() !== event.end.format() || e.title !== event.title;
                });
                localStorage.setItem("events", JSON.stringify(events));
            });
        },

        eventClick: function (calEvent) {
            var title = prompt("Edit Event Content:", calEvent.title);
            calEvent.title = title;
            $("#calendar").fullCalendar("updateEvent", calEvent);
            events.forEach(function (e, i) {
                if (e.start.format() === calEvent.start.format() && e.end.format() === calEvent.end.format() && e.title === calEvent.title) {
                    events[i].title = title;
                }
            });
            localStorage.setItem("events", JSON.stringify(events));
        },

        events: events
    });
});
