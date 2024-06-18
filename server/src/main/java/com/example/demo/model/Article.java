package com.example.demo.model;

import jakarta.persistence.Entity;
import lombok.Builder;

@Entity
@Builder
public class Article {
    String title;
    String shortDescription;
}
