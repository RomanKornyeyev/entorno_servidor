from django.urls import path

from . import views

app_name = "incidencias"
urlpatterns = [
    path('listado/', views.listado, name='listado'),
    path('incidencia/<int:id>', views.incidencia, name='incidencia'),
    path('exito/', views.exito, name='exito'),
]