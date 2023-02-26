from django.contrib import admin
from .models import Linea, Estacion, Incidencia

#para poder meter más campos dentro del propio campo
#se tiene que hacer así, no vale con register(Estacion, EstacionInline)
class EstacionInline(admin.TabularInline):
    model = Estacion

class LineaAdmin(admin.ModelAdmin):
    fieldsets = [
        ('Nombre de la linea',  {'fields': ['nombre_linea']}),
        ('Color',               {'fields': ['color']}),
        ('Distancia',           {'fields': ['distancia']}),
    ]
    inlines = [EstacionInline]

class IncidenciaAdmin(admin.ModelAdmin):
    fieldsets = [
        ('Info',            {'fields': ['texto']}),
        ('Fecha y hora',    {'fields': ['fecha'],
                           'classes': ['collapse']}), #esto no sería un comentario
    ]
    list_filter = ['fecha']


admin.site.register(Linea, LineaAdmin)
admin.site.register(Estacion) #se puede quitar, porque es redundante, se puede meter en el admin directamente desde línea
admin.site.register(Incidencia, IncidenciaAdmin)