# $FreeBSD$

PORTNAME=	lordsawar
PORTVERSION=	0.2.0
PORTREVISION=	3
CATEGORIES=	games
MASTER_SITES=	SAVANNAH

MAINTAINER=	ports@FreeBSD.org
COMMENT=	Warlords II clone

LICENSE=	GPLv3
LICENSE_FILE=	${WRKSRC}/COPYING

BUILD_DEPENDS=	bjam:${PORTSDIR}/devel/boost-jam \
		${LOCALBASE}/include/boost/shared_ptr.hpp:${PORTSDIR}/devel/boost-libs
LIB_DEPENDS=	libtar.so:${PORTSDIR}/devel/libtar \
		libuuid.so:${PORTSDIR}/misc/e2fsprogs-libuuid \
		libgnet-2.0.so:${PORTSDIR}/net/gnet2

USES=		gettext gmake pkgconfig
USE_GNOME=	gtkmm24 intltool
USE_SDL=	sdl image mixer
GNU_CONFIGURE=	yes
CONFIGURE_ARGS=	--with-boost-includedir=${LOCALBASE}/include

CPPFLAGS+=	-I${LOCALBASE}/include
LDFLAGS+=	-L${LOCALBASE}/lib

PORTDATA=	*

.include <bsd.port.mk>
