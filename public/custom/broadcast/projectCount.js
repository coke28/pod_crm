// PUBLIC CHANNEL  TEMPLATE
$(document).ready(function () {
    const channel = Echo.channel("public-project.1");
    channel
        .subscribed(() => {
            $.ajax({
                url: "/project/activeCount" ,
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (data) {
                    // Your success handling code here
                    data = JSON.parse(data);
                    updateProjectCard(data.projectActiveCount);
                },
                error: function (xhr, status, error) {
                    // This function will be called on AJAX failure
                    updateProjectCard("AJAX Request Failed:", status, error);
                },
            });
            console.log("subscribed");
        })
        .listen("FormEvent", (event) => {
            console.log(event);
            updateProjectCard(event.projectActiveCount);
        });

    function updateProjectCard(projectCount) {
        $("#active-project-count").text(projectCount);
    }
});
