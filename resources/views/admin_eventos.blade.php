@extends('admin_plantilla')

@section('content_control')
    <h1 class="display-3 text-center">Eventos</h1>
    <a class="btn btn-success btn-lg boton_registrar" href="/registro/gallery">Registrar</a>
    <div class="galleria">
            @php
                $count = 0;
            @endphp
            @foreach ($evento as $e)
                @if ($count ==0)
                    <div class="box-group">
                @endif
                @if ($count <2)
                @component('layouts.box-carousel')
                @slot('id',$g->id)
                @slot('imagenes', $g->galeria_imagenes)
                @slot('title', $g->Nombre)
                @slot('content', 'Ver más')
                        @slot('link','/admin')
                    @endcomponent
                    @component('layouts.modal')
                        @slot('id',$g->id)
                        @slot('imagenes',$g->galeria_imagenes)
                        @slot('title',$g->Nombre)
                        @slot('desc',$g->Description)
                        @slot('fecha',$g->Fecha_publicacion)
                    @endcomponent
                    @php
                        $count++;
                    @endphp
                @else
                    @component('layouts.box-carousel')
                        @slot('id',$g->id)
                        @slot('imagenes', $g->galeria_imagenes)
                        @slot('title', $g->Nombre)
                        @slot('content', 'Ver más')
                        @slot('link','/admin')
                    @endcomponent
                    @component('layouts.modal')
                        @slot('id',$g->id)
                        @slot('imagenes',$g->galeria_imagenes)
                        @slot('title',$g->Nombre)
                        @slot('desc',$g->Description)
                        @slot('fecha',$g->Fecha_publicacion)
                    @endcomponent
                    @php
                        $count=0;
                    @endphp
                    </div>
                @endif
            @endforeach
    </div>
    <nav style="margin-top: 40px;">
            <ul class="pagination justify-content-center pagination-lg">
            </ul>
    </nav>
    <script>
         $(document).ready(function() {
            $('.carousel').carousel();
         });

                // Returns an array of maxLength (or less) page numbers
        // where a 0 in the returned array denotes a gap in the series.
        // Parameters:
        //   totalPages:     total number of pages
        //   page:           current page
        //   maxLength:      maximum size of returned array
        function getPageList(totalPages, page, maxLength) {
        if (maxLength < 5) throw "maxLength must be at least 5";

        function range(start, end) {
            return Array.from(Array(end - start + 1), (_, i) => i + start);
        }

        var sideWidth = maxLength < 9 ? 1 : 2;
        var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
        var rightWidth = (maxLength - sideWidth * 2 - 2) >> 1;
        if (totalPages <= maxLength) {
            // no breaks in list
            return range(1, totalPages);
        }
        if (page <= maxLength - sideWidth - 1 - rightWidth) {
            // no break on left of page
            return range(1, maxLength - sideWidth - 1)
            .concat([0])
            .concat(range(totalPages - sideWidth + 1, totalPages));
        }
        if (page >= totalPages - sideWidth - 1 - rightWidth) {
            // no break on right of page
            return range(1, sideWidth)
            .concat([0])
            .concat(
                range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages)
            );
        }
        // Breaks on both sides
        return range(1, sideWidth)
            .concat([0])
            .concat(range(page - leftWidth, page + rightWidth))
            .concat([0])
            .concat(range(totalPages - sideWidth + 1, totalPages));
        }

        $(function() {
        // Number of items and limits the number of items per page
        var numberOfItems = $(".galleria .box-group").length;
        var limitPerPage =4;
        // Total pages rounded upwards
        var totalPages = Math.ceil(numberOfItems / limitPerPage);
        // Number of buttons at the top, not counting prev/next,
        // but including the dotted buttons.
        // Must be at least 5:
        var paginationSize = 7;
        var currentPage;

        function showPage(whichPage) {
            if (whichPage < 1 || whichPage > totalPages) return false;
            currentPage = whichPage;
            $(".galleria .box-group")
            .hide()
            .slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage)
            .show();
            // Replace the navigation items (not prev/next):
            $(".pagination li").slice(1, -1).remove();
            getPageList(totalPages, currentPage, paginationSize).forEach(item => {
            $("<li>")
                .addClass(
                "page-item " +
                    (item ? "current-page " : "") +
                    (item === currentPage ? "active " : "")
                )
                .append(
                $("<a>")
                    .addClass("page-link")
                    .attr({
                    href: "javascript:void(0)"
                    })
                    .text(item || "...")
                )
                .insertBefore("#next-page");
            });
            return true;
        }

        // Include the prev/next buttons:
        $(".pagination").append(
            $("<li>").addClass("page-item").attr({ id: "previous-page" }).append(
            $("<a>")
                .addClass("page-link")
                .attr({
                href: "javascript:void(0)"
                })
                .text("Prev")
            ),
            $("<li>").addClass("page-item").attr({ id: "next-page" }).append(
            $("<a>")
                .addClass("page-link")
                .attr({
                href: "javascript:void(0)"
                })
                .text("Next")
            )
        );
        // Show the page links
        $(".galleria").show();
        showPage(1);

        // Use event delegation, as these items are recreated later
        $(
            document
        ).on("click", ".pagination li.current-page:not(.active)", function() {
            return showPage(+$(this).text());
        });
        $("#next-page").on("click", function() {
            return showPage(currentPage + 1);
        });

        $("#previous-page").on("click", function() {
            return showPage(currentPage - 1);
        });
        $(".pagination").on("click", function() {
            $("html,body").animate({ scrollTop: 0 }, 0);
        });
        });


    </script>
@endsection

