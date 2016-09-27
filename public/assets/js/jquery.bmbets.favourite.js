
(function (n) {
    n(function () {
        function Favourites() {
            this.fav = n("#favorits");
            this.call = function (t, r) {
                var self = this;
                n.ajax({
                    type: "POST",
                    url: t,
                    data: r,
                    success: function (t) {
                        self.fav.html(t);
                        self.bind();
                    }
                })
            };
            this.click = function (elem) {
                var f = n(elem);
                var r = f.data();
                if (f.hasClass("favourited")) {
                    this.call("/account/removefavorit", { leagueId: r.league });
                    n(".favourite[data-league=\"" + r.league + "\"]").removeClass("favourited");
                } else {
                    this.call("/account/addfavorit", { leagueId: r.league });
                    n(".favourite[data-league=\"" + r.league + "\"]").addClass("favourited");
                }
            };
            this.bind = function () {
                var self = this;
                this.fav.find(".delete-favourite").bind({
                    click: function (t) {
                        return t.stopPropagation(),
                        r = n(this).data(),
                        self.call("/account/removefavorit", { leagueId: r.league }),
                        n(".favourite[data-league=\"" + r.league + "\"]").removeClass("favourited"),
                        n(this).parent().remove()
                    }
                });
            }
            this.bind();
        }
        n.favourites === undefined && (n.favourites = new Favourites());
       
        function Advertisement() {
            var name = "adv-r";
            var $body = $("body");
            var $main = $("#main-container");
            $body.append("<div class='fixadv'></div>")
            var $fixadv = $(".fixadv");
            var width = ($body.width() - $main.width()) / 2 - 20;

            $.ajax({
                type: "POST",
                url: "/adv",
                data: { n: name, w: width },
                success: function (data) {
                    $fixadv.html(data)
                    var w = ($body.width() - $main.width()) / 2 - 20;
                    if (w < $fixadv.width())
                        $fixadv.hide();
                },
                error: function () {
                },
            });

            if (width < $fixadv.width())
                $fixadv.hide();
            else
                $fixadv.show();

            $(window).resize(function () {
                var w = ($body.width() - $main.width()) / 2 - 20;
                if (w < $fixadv.width())
                    $fixadv.hide();
                else
                    $fixadv.show();
                //$("#log").html("x=" + (($body.width() - $main.width() ) / 2 - ($fixadv.width()+10)) + " y=" + $fixadv.width())
            });
        }
        Advertisement();
    })

})(jQuery);
