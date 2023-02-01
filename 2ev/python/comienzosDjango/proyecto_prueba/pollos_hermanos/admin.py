from django.contrib import admin

from .models import Usuarios, Planes

# Register your models here.
admin.site.register(Usuarios)
admin.site.register(Planes)