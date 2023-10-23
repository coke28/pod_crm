// PUBLIC CHANNEL  TEMPLATE
$(document).ready(function () {
    const channel = Echo.channel("public-image.1");
    channel
        .subscribed(() => {
            $.ajax({
                url: "/image/activeCount" ,
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
                    updateImageCard(data.imageActiveCount);
                },
                error: function (xhr, status, error) {
                    // This function will be called on AJAX failure
                    updateImageCard("AJAX Request Failed:", status, error);
                },
            });
            console.log("subscribed");
        })
        .listen("FormEvent", (event) => {
            console.log(event);
            updateImageCard(event.imageActiveCount);
        });

    function updateImageCard(imageCount) {
        $("#active-image-count").text(imageCount);
    }
});
