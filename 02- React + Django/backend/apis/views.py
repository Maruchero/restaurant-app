from django.shortcuts import render
from django.views.decorators.csrf import csrf_exempt
from rest_framework.parsers import JSONParser
from django.http import JsonResponse

from .models import *
from .serializers import *

# Create your views here.
def generalApi(request, base_class, base_serializer):
    if (request.method == 'GET'):
        objects = base_class.objects.all()
        serializer = base_serializer(objects, many=True)
        return JsonResponse(serializer.data, safe=False)

    elif (request.method == 'POST'):
        data = JSONParser().parse(request)
        serializer = base_serializer(data=data)
        if serializer.is_valid():
            serializer.save()
            return JsonResponse("Added succesfully", safe=False)
        return JsonResponse(serializer.errors, safe=False)        

    elif (request.method == 'PUT'):
        data = JSONParser().parse(request)
        object_ = base_class.objects.get(id=data['id'])
        serializer = base_serializer(object_, data=data)
        if serializer.is_valid():
            serializer.save()
            return JsonResponse("Updated succesfully", safe=False)
        return JsonResponse(serializer.errors, safe=False)

    elif (request.method == 'DELETE'):
        data = JSONParser().parse(request)
        object_ = base_class.objects.get(id=data['id'])
        object_.delete()
        return JsonResponse("Deleted succesfully", safe=False)

@csrf_exempt
def restaurantApi(request):
    return generalApi(request, Restaurant, RestaurantSerializer)

@csrf_exempt
def menuApi(request):
    return generalApi(request, Menu, MenuSerializer)

@csrf_exempt
def dishApi(request):
    return generalApi(request, Dish, DishSerializer)

@csrf_exempt
def areaApi(request):
    return generalApi(request, Area, AreaSerializer)

@csrf_exempt
def tableApi(request):
    return generalApi(request, Table, TableSerializer)

@csrf_exempt
def orderApi(request):
    return generalApi(request, Order, OrderSerializer)

@csrf_exempt
def orderDishApi(request):
    return generalApi(request, OrderDish, OrderDishSerializer)
