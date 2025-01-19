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

--
-- Name: set_log_date(); Type: FUNCTION; Schema: public; Owner: docker
--

CREATE FUNCTION public.set_log_date() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    NEW.log_date := CURRENT_DATE;
    RETURN NEW;
END;
$$;


ALTER FUNCTION public.set_log_date() OWNER TO docker;

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
-- Name: logs; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.logs (
    id_user character varying(30),
    log_date date
);


ALTER TABLE public.logs OWNER TO docker;

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
    id_user character varying(30) NOT NULL,
    id_role integer DEFAULT 1 NOT NULL,
    email character varying(100) NOT NULL,
    password character varying(100) NOT NULL,
    username character varying(50) NOT NULL
);


ALTER TABLE public.users OWNER TO docker;

--
-- Name: categories id_category; Type: DEFAULT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.categories ALTER COLUMN id_category SET DEFAULT nextval('public.categories_id_category_seq'::regclass);


--
-- Name: posts id_post; Type: DEFAULT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.posts ALTER COLUMN id_post SET DEFAULT nextval('public.posts_id_post_seq'::regclass);


--
-- Data for Name: bookmark; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.bookmark (id_user, id_post) FROM stdin;
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.categories (id_category, category_name, category_desc) FROM stdin;
\.


--
-- Data for Name: logs; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.logs (id_user, log_date) FROM stdin;
678c42ef012345.79664253	2025-01-19
\.


--
-- Data for Name: post_categories; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.post_categories (id_post, id_category) FROM stdin;
\.


--
-- Data for Name: posts; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.posts (id_post, id_user_owner, title, description, image, created_at, total_score, total_reviews) FROM stdin;
\.


--
-- Data for Name: rating; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.rating (id_user, id_post, score) FROM stdin;
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.roles (id_role, role_desc) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.users (id_user, id_role, email, password, username) FROM stdin;
678c42ef012345.79664253	1	test@test123.pl	$2y$10$DeShjL4hiD0NANwZZmhSY.prv1lMZKr18eoQT.J.fPdoeZQ5yXTsW	test
\.


--
-- Name: categories_id_category_seq; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.categories_id_category_seq', 1, false);


--
-- Name: posts_id_post_seq; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.posts_id_post_seq', 1, false);


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
-- Name: logs before_insert_logs; Type: TRIGGER; Schema: public; Owner: docker
--

CREATE TRIGGER before_insert_logs BEFORE INSERT ON public.logs FOR EACH ROW EXECUTE FUNCTION public.set_log_date();


--
-- Name: bookmark bookmark_id_post_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.bookmark
    ADD CONSTRAINT bookmark_id_post_fkey FOREIGN KEY (id_post) REFERENCES public.posts(id_post) ON UPDATE CASCADE ON DELETE CASCADE;


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
-- Name: rating rating_id_post_fkey; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.rating
    ADD CONSTRAINT rating_id_post_fkey FOREIGN KEY (id_post) REFERENCES public.posts(id_post) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

