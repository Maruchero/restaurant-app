from django.urls import path

from .views import restaurant_api, menu_api, dish_api, area_api, table_api, order_api, order_dish_api

urlpatterns = [
    path('restaurant/<str:method>/', restaurant_api),
    path('menu/<str:method>/', menu_api),
    path('dish/<str:method>/', dish_api),
    path('area/<str:method>/', area_api),
    path('table/<str:method>/', table_api),
    path('order/<str:method>/', order_api),
    path('orderDish/<str:method>/', order_dish_api),
]