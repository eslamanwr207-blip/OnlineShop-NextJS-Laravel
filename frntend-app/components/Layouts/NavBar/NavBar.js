'use client';  // هذا السطر ضروري جدًا

import { useState } from "react";
import { Navbar, Nav, Container, Button } from "react-bootstrap";
import { FaBars, FaShoppingCart, FaTimes } from "react-icons/fa";
import Link from "next/link";
import { useRouter } from "next/navigation";


export default function NavBar(){
  const [expanded, setExpanded] = useState(false);
  const router = useRouter();

  const handleLogout = () => {
    if (typeof window !== "undefined") {
      localStorage.removeItem("token");
    }
    router.push("/login");
  };

  return (
    <Navbar 
      expand="md" 
      bg="white" 
      variant="light" 
      fixed="top" 
      className={`shadow transition-navbar ${expanded ? "navbar-expanded" : ""}`} 
      expanded={expanded}
    >
      <Container>
        {/* Logo */}
        <Navbar.Brand as={Link} href="/" className="fw-bold text-primary">
           OnlineShop
        </Navbar.Brand>

        {/* زر القائمة للجوال */}
        <Navbar.Toggle onClick={() => setExpanded(!expanded)}>
          {expanded ? <FaTimes size={24} /> : <FaBars size={24} />}
        </Navbar.Toggle>

        {/* قائمة الروابط */}
        <Navbar.Collapse>
          <Nav className="ms-auto">

            <Nav.Link as={Link} href="/categories" className="text-dark" style={{fontSize: "20px", fontWeight:"bold"}}
             onClick={() => setExpanded(false)}>
              الأقسام
            </Nav.Link>
            <Nav.Link as={Link} href="/products" className="text-dark" style={{fontSize: "20px", fontWeight:"bold"}}
             onClick={() => setExpanded(false)}>
              المنتجات
            </Nav.Link>

            {/* زر تسجيل الخروج */}
            <Button variant="link" className="text-dark nav-link" style={{textAlign: "right", fontSize: "20px", fontWeight:"bold"}}
             onClick={handleLogout}>
              تسجيل الخروج
            </Button>

            {/* أيقونة عربة التسوق */}
            <Nav.Link as={Link} href="/cart" className="text-dark position-relative ms-3" onClick={() => setExpanded(false)}>
              <FaShoppingCart size={24} />
              {/* <Badge bg="danger" className="position-absolute top-0 start-100 translate-middle">
                3
              </Badge> */}
            </Nav.Link>
          </Nav>
        </Navbar.Collapse>
      </Container>

    </Navbar>
  );
};

