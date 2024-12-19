--
-- PostgreSQL database dump
--

-- Dumped from database version 17.2 (Debian 17.2-1.pgdg120+1)
-- Dumped by pg_dump version 17.2 (Debian 17.2-1.pgdg120+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: bookmark; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.bookmark (
    id_user integer NOT NULL,
    id_post integer NOT NULL
);


ALTER TABLE public.bookmark OWNER TO docker;

--
-- Name: categories; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.categories (
    id_category integer NOT NULL,
    category_name character varying(255),
    category_desc character varying(255)
);


ALTER TABLE public.categories OWNER TO docker;

--
-- Name: categories_id_category_seq; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.categories_id_category_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.categories_id_category_seq OWNER TO docker;

--
-- Name: categories_id_category_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: docker
--

ALTER SEQUENCE public.categories_id_category_seq OWNED BY public.categories.id_category;


--
-- Name: post_categories; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.post_categories (
    id_post integer NOT NULL,
    id_category integer NOT NULL
);


ALTER TABLE public.post_categories OWNER TO docker;

--
-- Name: posts; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.posts (
    id_post integer NOT NULL,
    id_user_owner integer NOT NULL,
    title character varying(255) NOT NULL,
    description text NOT NULL,
    image character varying(255),
    created_at character varying(20) NOT NULL,
    total_score integer DEFAULT 0 NOT NULL,
    total_reviews integer DEFAULT 0 NOT NULL
);


ALTER TABLE public.posts OWNER TO docker;

--
-- Name: posts_id_post_seq; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.posts_id_post_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.posts_id_post_seq OWNER TO docker;

--
-- Name: posts_id_post_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: docker
--

ALTER SEQUENCE public.posts_id_post_seq OWNED BY public.posts.id_post;


--
-- Name: rating; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.rating (
    id_user integer NOT NULL,
    id_post integer NOT NULL,
    score integer NOT NULL,
    CONSTRAINT rating_score_check CHECK (((score >= '-1'::integer) AND (score <= 1)))
);


ALTER TABLE public.rating OWNER TO docker;

--
-- Name: roles; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.roles (
    id_role integer NOT NULL,
    role_desc character varying(20) NOT NULL
);


ALTER TABLE public.roles OWNER TO docker;

--
-- Name: users; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.users (
    id_user integer NOT NULL,
    id_role integer DEFAULT 1 NOT NULL,
    email character varying(100) NOT NULL,
    password character varying(100) NOT NULL,
    username character varying(50) NOT NULL
);


ALTER TABLE public.users OWNER TO docker;

--
-- Name: users_id_user_seq; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.users_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_user_seq OWNER TO docker;

--
-- Name: users_id_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: docker
--

ALTER SEQUENCE public.users_id_user_seq OWNED BY public.users.id_user;


--
-- Name: categories id_category; Type: DEFAULT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.categories ALTER COLUMN id_category SET DEFAULT nextval('public.categories_id_category_seq'::regclass);


--
-- Name: posts id_post; Type: DEFAULT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.posts ALTER COLUMN id_post SET DEFAULT nextval('public.posts_id_post_seq'::regclass);


--
-- Name: users id_user; Type: DEFAULT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.users ALTER COLUMN id_user SET DEFAULT nextval('public.users_id_user_seq'::regclass);


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id_category);


--
-- Name: posts posts_pkey; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_pkey PRIMARY KEY (id_post);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id_role);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id_user);


--
-- Name: bookmark bookmark_id_post_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.bookmark
    ADD CONSTRAINT bookmark_id_post_fkey FOREIGN KEY (id_post) REFERENCES public.posts(id_post) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: bookmark bookmark_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.bookmark
    ADD CONSTRAINT bookmark_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: post_categories post_categories_id_category_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.post_categories
    ADD CONSTRAINT post_categories_id_category_fkey FOREIGN KEY (id_category) REFERENCES public.categories(id_category) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: post_categories post_categories_id_post_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.post_categories
    ADD CONSTRAINT post_categories_id_post_fkey FOREIGN KEY (id_post) REFERENCES public.posts(id_post) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: posts posts_id_user_owner_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_id_user_owner_fkey FOREIGN KEY (id_user_owner) REFERENCES public.users(id_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: rating rating_id_post_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.rating
    ADD CONSTRAINT rating_id_post_fkey FOREIGN KEY (id_post) REFERENCES public.posts(id_post) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: rating rating_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.rating
    ADD CONSTRAINT rating_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: users users_id_role_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_id_role_fkey FOREIGN KEY (id_role) REFERENCES public.roles(id_role) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

