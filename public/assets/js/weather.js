url =

    fetch("user/follow", {
        method: "GET",
        body: "followedId=" + photoUserId,
        headers: { "Content-Type": "application/x-www-form-urlencoded" }
    }).then((response) => {