@(template/layout)@
@content
<div class="container">
<div class="card text-center">
    <div class="card-header">
        Рекомендуемые
    </div>
    <div class="card-body">
        <h5 class="card-title">Особое обращение с заголовком</h5>
        <p class="card-text">С вспомогательным текстом ниже в качестве естественного перехода к дополнительному контенту.</p>
        <a href="#" class="btn btn-primary">Перейти куда-нибудь</a>
    </div>
    <div class="card-footer text-muted">
        2 дня спустя
        {! some !}
    </div>
</div>
</div>
&(parts/menu)&
@endcontent
@footer
Это подвал
@endfooter