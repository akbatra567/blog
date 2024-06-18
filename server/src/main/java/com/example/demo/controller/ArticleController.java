package com.example.demo.controller;

import com.example.demo.model.Article;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseStatus;
import org.springframework.web.bind.annotation.RestController;

import java.util.ArrayList;

@RequestMapping("/article")
@RestController
public class ArticleController {
    ArrayList<Article> articleList;
    ArticleController(){
        articleList = new ArrayList<Article>();
    }

    @ResponseStatus(HttpStatus.OK)
    @GetMapping("/")
    ResponseEntity<String> getArticle(){

        return ResponseEntity.ok("Hello World");
    }
}
