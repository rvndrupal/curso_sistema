@extends('principal')
@section('contenido')

<template v-if="menu==0">
<h1>Del meno cero donde van datos</h1>
</template>
<template v-if="menu==1">
<categoria></categoria>
</template>
<template v-if="menu==2">
<articulo></articulo>
</template>
<template v-if="menu==3">
<h1>ESto es el tres</h1>
</template>
<template v-if="menu==4">
<proveedor></proveedor>
</template>
<template v-if="menu==5">
<h1>ESTO ES EL CONTENIDO NUMERO cinco</h1>
</template>
<template v-if="menu==6">
<cliente></cliente>
</template>
<template v-if="menu==7">
<h1>ESTO ES EL CONTENIDO NUMERO SIETE</h1>
</template>
<template v-if="menu==8">
<h1>ESTO ES EL CONTENIDO NUMERO OCHO</h1>
</template>
<template v-if="menu==9">
<h1>ESTO ES EL CONTENIDO NUMERO NUEVE</h1>
</template>
<template v-if="menu==10">
<h1>ESTO ES EL CONTENIDO NUMERO DIEZ</h1>
</template>
<template v-if="menu==11">
<h1>ESTO ES EL CONTENIDO NUMERO ONCE</h1>
</template>
<template v-if="menu==12">
<h1>ESTO ES EL CONTENIDO NUMERO DOCE</h1>
</template>



@endsection
