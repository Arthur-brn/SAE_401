package com.example.teloculture

import retrofit2.Call
import retrofit2.http.Field
import retrofit2.http.FormUrlEncoded
import retrofit2.http.GET
import retrofit2.http.POST
import retrofit2.http.Query

interface ApiService {
    @GET("android_backend/get_books.php")
    fun getBooks(): Call<List<Book>>

    @FormUrlEncoded
    @POST("android_backend/login.php")
    fun login(
        @Field("mail") mail: String,
        @Field("password") password: String
    ): Call<LoginResponse>

}
